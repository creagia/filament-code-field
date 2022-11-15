import { basicSetup, EditorView } from "codemirror"
import { json } from "@codemirror/lang-json"
import { indentWithTab } from '@codemirror/commands';
import { keymap } from '@codemirror/view'

export default (Alpine) => {
    Alpine.data('filamentJsonField', ({ state, disabled }) => {
        return {
            state,
            init() {
                console.log('disabled: ' + disabled ? 1 : 0);
                new EditorView({
                    doc: this.state,
                    extensions: this.buildExtensionsArray(),
                    parent: this.$refs.jsonBlock
                })
            },
            buildExtensionsArray() {
                let extensions = [
                    basicSetup,
                    json(),
                    keymap.of([indentWithTab]),
                    EditorView.lineWrapping,
                    EditorView.updateListener.of((v) => {
                        if (v.docChanged) {
                            this.state = v.state.doc.toString();
                        }
                    }),
                    EditorView.contentAttributes.of({ contenteditable: !disabled })
                ];

                // add conditional extensions...

                return extensions;
            }
        }
    });
}
