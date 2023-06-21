<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    :disabled="$isDisabled()"
    dir="ltr"
>
    <style>
        :root {
            --minInputHeight: {{ $getMinHeight() }};
            --maxInputHeight: {{ $getMaxHeight() }};
        }
    </style>
    <div x-data="filamentCodeField({
        state: $wire.{{ $applyStateBindingModifiers('entangle(\''.$getStatePath().'\')') }},
        displayMode: {{ $displayMode ? 1 : 0 }},
        language: '{{ $language }}',
        disabled: {{ $isDisabled() ? 1 : 0 }},
        withLineNumbers: {{ $lineNumbers ? 1 : 0 }},
        withAutocompletion: {{ $autocompletion ? 1 : 0 }}
    })">
        <div wire:ignore
             x-ref="codeBlock"
             class="bg-white border overflow-hidden block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 dark:bg-gray-700 dark:text-white dark:focus:border-primary-500 border-gray-300 dark:border-gray-600"
        ></div>
    </div>
</x-dynamic-component>
