<template>
    <!--    navigation breadcrumb-->
    <nav class="flex " aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'landingPage'}"
                             class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Home
                </router-link>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path></svg>
                    <span
                        class="ml-1 text-sm font-medium md:ml-2 text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Sign Up</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="signup__section">
        <h1 class="mt-8" @click="createUser">{{ $t("signUp.title")}}</h1>
        <form v-on:submit.prevent="createUser" action="/signup" method="post">
            <div class="form-control w-full max-w-xs mx-auto mt-12 flex flex-col space-y-5">
                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" v-model="email" id="email" />
                    <span class="text-red-500 text-sm" v-for="email in message_email">{{ email }}</span>
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">{{ $t("signUp.password") }}</span>
                    </label>
                    <input type="password" placeholder="Password" v-model="password" id="password" autocomplete="off"/>
                    <span class="text-red-500 text-sm" v-for="password in message_password">{{ password }}</span>
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">{{ $t("signUp.confirmPassword") }}</span>
                    </label>
                    <input type="password" placeholder="Password confirmation" v-model="password_confirmation" id="password_confirmation" autocomplete="off"/>
                </div>
                <div class=" flex space-x-4 mt-4">
                    <div>
                        <span class="label-text">{{ $t("signUp.rememberToken") }}</span>
                    </div>
                    <div>
                        <input type="checkbox" class="w-4 h-4" v-model="remember_token" id="remember_token" />
                    </div>
                </div>




                <p class="mt-6 text-center text-arth-dark-blue"><router-link :to="{ name: 'login'}">{{
                        $t('signUp.haveAccount') }}</router-link></p>
            </div>

            <div class="flex mx-auto mt-12 mb-8">
                <button class="bg-arth-green hover:scale-105" >{{ $t("signUp.button") }}</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'signUp',
    data() {
        return {
            email: '',
            password: '',
            password_confirmation: '',
            message_email:'',
            message_password: '',
            remember_token: '',
            token:''
        }
    },
    methods: {
        async createUser(){

            const response = await axios.post('api/register', {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            })
            if(typeof response.data.message !== 'undefined'){
                this.message_email = response.data.message.email
                this.message_password = response.data.message.password
            }
            if(response.data.token){
                this.token = response.data.token
                localStorage.setItem("token", this.token)
            }

            // this.$router.push('/');
            console.log(response)
            console.log(this.token)
        }
    }
}
</script>

<style scoped>
.signup__section {
    @apply w-11/12 sm:w-96 md:w-3/6 lg:w-4/12 mx-auto
}
</style>
