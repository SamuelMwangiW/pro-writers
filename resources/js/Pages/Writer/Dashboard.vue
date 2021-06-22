<template>
    <writer-app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Writer Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                </div>
            </div>
        </div>
    </writer-app-layout>
</template>

<script>
    import WriterAppLayout from '@/Layouts/WriterAppLayout.vue'

    export default {
        components: {
            WriterAppLayout,
        },
    }
</script>
