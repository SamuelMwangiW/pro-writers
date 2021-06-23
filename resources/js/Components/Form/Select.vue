<template>
    <select
        v-model="selectedId"
        @change="$emit('option-selected',selectedId)"
        class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option
            v-for="item in allItems"
            :value="item[valueAttr]"
        >
            {{ item[optionText] }}
        </option>
    </select>
</template>

<script>
import {computed} from 'vue'
import {CheckIcon, SelectorIcon} from '@heroicons/vue/solid'


export default {
    components: {
        CheckIcon,
        SelectorIcon,
    },
    props: {
        items: {type: Array, required: true},
        valueAttr: {type: String, default: 'id'},
        optionText: {type: String, default: 'name'},
        selectedId: {default: null}
    },
    setup({items, valueAttr, optionText}) {
        const allItems = computed(() => [...items, {[valueAttr]: null, [optionText]: '--SELECT--'}]);

        return {
            allItems
        }
    },
    emits: ['option-selected']
}
</script>
