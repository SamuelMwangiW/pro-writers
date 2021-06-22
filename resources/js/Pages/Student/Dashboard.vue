<template>
    <student-app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Student Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                </div>
            </div>
        </div>
    </student-app-layout>
</template>

<script>
    import StudentAppLayout from '@/Layouts/StudentAppLayout.vue'

    export default {
        components: {
            StudentAppLayout,
        },
    }
</script>
