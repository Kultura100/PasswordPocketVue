<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Home2 from '@/Pages/Home2.vue';
	export default {
		name: 'dashboard',
		components: {
			AppLayout,
			Home2,
		},
		props: ["diary"],
		data() {
			return {
				form: {
                    url: null,
                    login: null,
                    password: null,
				}
			}
		},
	}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kokpit
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Home2 :diary="diary" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
