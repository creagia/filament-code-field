import CodeFieldAlpinePlugin from './code-field';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(CodeFieldAlpinePlugin);
})
