<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import Button from '@/Jetstream/Button.vue';
	export default {
		name: 'home',
		components: {
			AppLayout,
			Welcome,
            Button
		},
		props: ["diary"],
		data() {
			return {
				form: {
                    url: null,
                    login: null,
                    password: null,
                    passwordauth:null,
				}
			}
		},
		methods: {
			OnSend() {
				var self = this
				this.$inertia.post('/addpassword', this.form)
			},
            OnCheck() {
				var self = this
				this.$inertia.post('/showpassword', this.form)
			},
		},
	}
</script>

<template>
<div class="flex flex-wrap flex-row">
<form class="w-full max-w-lg p-10" @submit.prevent="onSubmit">
    <h2 class="font-bold text-lg mb-3">Dodaj nowe hasło do pamietnika</h2>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        URL
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="www.facebook.com" v-model="form.url">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        LOGIN
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="jan.kowalski@wp.pl" v-model="form.login">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        PASSWORD
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************" v-model="form.password">
    </div>
  </div>
    <Button @click="OnSend" class="mt-2">
    Dodaj nowe hasło
    </Button> 
</form>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    URL
                </th>
                <th scope="col" class="px-6 py-3">
                    LOGIN
                </th>
                <th scope="col" class="px-6 py-3">
                    PASSWORD
                </th>
                   <th scope="col" class="px-6 py-3">
                    Wygasanie
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="dziennik in diary" class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                <td class="px-6 py-4">
                  {{ dziennik.url }}
                </td>
                <td class="px-6 py-4">
                {{ dziennik.login }}
                </td>
                <td class="px-6 py-4">
                       ********
                </td>
                <td class="px-6 py-4">
                <div class="font-bold font-sm text-green-500">Haslo jest aktualne</div>
                </td>
            </tr>
        </tbody>
    </table>
    <div v-if="diary.length">
                <form class="w-full max-w-lg p-10" @submit.prevent="onSubmit">
                    <h2 class="font-bold text-lg mb-3">Odkryj hasła, podając hasło do aktualnie zalogowanego konta.</h2>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Password
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="password" v-model="form.passwordauth">
                        </div>
                    </div>
                        <Button @click="OnCheck" class="">
                        Pokaz hasła
                        </Button> 
                </form>
    </div>
</div>
</div>
</template>