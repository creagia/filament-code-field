<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php($codeFieldId = 'code-field-'.\Illuminate\Support\Str::slug($getId()))

    <style>
        #{{ $codeFieldId }} .cm-scroller {
            max-height: {{ $getMaxHeight() }} !important;
        }

        #{{ $codeFieldId }} .cm-scroller, .cm-gutter {
            min-height: {{ $getMinHeight() }} !important;
        }
    </style>

    <div x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-code-field', package: 'creagia/filament-code-field'))]"
         x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('filament-code-field', package: 'creagia/filament-code-field'))]"
         x-data="filamentCodeField({
            state: $wire.{{ $applyStateBindingModifiers('entangle(\''.$getStatePath().'\')') }},
            displayMode: {{ $field->displayMode ? 1 : 0 }},
            language: '{{ $field->language }}',
            disabled: {{ $field->isDisabled() ? 1 : 0 }},
            withLineNumbers: {{ $field->lineNumbers ? 1 : 0 }},
            withAutocompletion: {{ $field->autocompletion ? 1 : 0 }}
        })"
    >
        <div id="{{ $codeFieldId }}" wire:ignore>
            <div x-ref="codeBlock"
                 class="fi-input-wrapper !block !caret-black flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:!caret-white dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden"
            ></div>
        </div>
    </div>
</x-dynamic-component>
