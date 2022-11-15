import { basicSetup, EditorView } from "codemirror"
import { json } from "@codemirror/lang-json"
import { indentWithTab } from '@codemirror/commands';
import { keymap } from '@codemirror/view'
import { Compartment } from '@codemirror/state';
import { basicLight } from 'cm6-theme-basic-light';
import { solarizedDark } from 'cm6-theme-solarized-dark';

let theme = new Compartment

export default (Alpine) => {
    Alpine.data('filamentCodeField', ({ state, disabled }) => {
        return {
            state,
            codeMirror: null,
            init() {
                this.codeMirror = new EditorView({
                    doc: this.state ? this.state : '{\n\n}',
                    extensions: this.buildExtensionsArray(),
                    parent: this.$refs.codeBlock
                })

                window.addEventListener('dark-mode-toggled', (e) => {
                    this.codeMirror.dispatch({
                        effects: theme.reconfigure(
                            e.detail === 'dark'
                                ? solarizedDark
                                : basicLight
                        )
                    })
                });
            },
            buildExtensionsArray() {
                const darkModeElement = document.querySelector('[dark-mode]')
                const lightMode = darkModeElement._x_dataStack[0].theme === 'light'

                return [
                    basicSetup,
                    json(),
                    keymap.of([indentWithTab]),
                    EditorView.lineWrapping,
                    EditorView.updateListener.of((v) => {
                        if (v.docChanged) {
                            this.state = v.state.doc.toString();
                        }
                    }),
                    EditorView.contentAttributes.of({ contenteditable: !disabled }),
                    theme.of(lightMode ? basicLight : solarizedDark)
                ];
            }
        }
    });
}
