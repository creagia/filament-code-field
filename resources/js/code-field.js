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

let theme = new Compartment

export default (Alpine) => {
    Alpine.data('filamentCodeField', ({
        state,
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
                    doc: this.parsedState(),
                    extensions: this.buildExtensionsArray(),
                    parent: this.$refs.codeBlock
                })

                window.addEventListener('dark-mode-toggled', (e) => {
                    this.codeMirror.dispatch({
                        effects: theme.reconfigure(
                            e.detail === 'dark'
                                ? darkTheme
                                : lightTheme
                        )
                    })
                });
            },
            parsedState() {
                if (language === 'json') {
                    return this.state
                        ? JSON.stringify(this.state, null, 2)
                        : '{\n\n}'
                }

                return this.state
            },
            buildExtensionsArray() {
                const darkModeElement = document.querySelector('[dark-mode]')
                const lightMode = darkModeElement._x_dataStack[0].theme === 'light'

                let extensions = [
                    this.parsers[language](),
                    keymap.of([indentWithTab]),
                    theme.of(lightMode ? lightTheme : darkTheme),
                    EditorView.contentAttributes.of({contenteditable: !disabled}),
                    EditorView.lineWrapping,
                    EditorView.updateListener.of((v) => {
                        if (v.docChanged) {
                            this.state = v.state.doc.toString();
                        }
                    })
                ];

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
