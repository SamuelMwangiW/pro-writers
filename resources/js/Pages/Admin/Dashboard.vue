<template>
    <admin-app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                </div>
            </div>
        </div>
    </admin-app-layout>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout.vue'

    export default {
        components: {
            AdminAppLayout,
        },
    }
</script>
