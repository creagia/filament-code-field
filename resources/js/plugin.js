import JsonFieldAlpinePlugin from './components/json-field';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(JsonFieldAlpinePlugin);
})
