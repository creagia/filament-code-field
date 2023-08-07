import { EditorView } from "codemirror"
import { indentWithTab } from '@codemirror/commands';
import { keymap, lineNumbers } from '@codemirror/view';
import { Compartment } from '@codemirror/state';
import { php } from "@codemirror/lang-php"
import { javascript } from "@codemirror/lang-javascript"
import { json } from "@codemirror/lang-json"
import { html } from "@codemirror/lang-html"
import { css } from '@codemirror/lang-css';
import { xml } from "@codemirror/lang-xml"
import { sql } from "@codemirror/lang-sql"
import { autocompletion } from '@codemirror/autocomplete';
import darkTheme from './themes/dark'
import lightTheme from './themes/light'

let themeCompartment = new Compartment

export default (Alpine) => {
    Alpine.data('filamentCodeField', ({
        state,
        displayMode,
        language,
        disabled,
        withLineNumbers,
        withAutocompletion
    }) => {
        return {
            state,
            codeMirror: null,
            parsers: { php, javascript, json, html, css, xml, sql },
            init() {
                this.codeMirror = new EditorView({
                    doc: this.state,
                    extensions: this.buildExtensionsArray(),
                    parent: this.$refs.codeBlock
                })

                if (displayMode) {
                    this.$watch('state', newState => {
                        this.codeMirror.dispatch({
                            changes: {
                                from: 0,
                                to: this.codeMirror.state.doc.length,
                                insert: newState
                            }
                        });
                    })
                }

                window.addEventListener('dark-mode-toggled', (e) => {
                    this.codeMirror.dispatch({
                        effects: themeCompartment.reconfigure(
                            e.detail === 'dark'
                                ? darkTheme
                                : lightTheme
                        )
                    })
                });
            },
            buildExtensionsArray() {
                let themeName;

                if (typeof theme === 'undefined') {
                    themeName = 'light';
                } else if (theme === 'system') {
                    themeName = window.matchMedia('(prefers-color-scheme: dark)').matches
                            ? 'dark'
                            : 'light';
                } else {
                    themeName = theme;
                }

                let extensions = [
                    this.parsers[language](),
                    keymap.of([indentWithTab]),
                    themeCompartment.of(themeName === 'light' ? lightTheme : darkTheme),
                    EditorView.contentAttributes.of({
                        contenteditable: !disabled && !displayMode
                    }),
                    EditorView.lineWrapping
                ];

                if (! displayMode) {
                    extensions.push(EditorView.updateListener.of((v) => {
                        if (v.docChanged) {
                            this.state = v.state.doc.toString()
                        }
                    }))
                }

                if (withAutocompletion) {
                    extensions.push(autocompletion());
                }

                if (withLineNumbers) {
                    extensions.push(lineNumbers());
                }

                return extensions;
            }
        }
    });
}
