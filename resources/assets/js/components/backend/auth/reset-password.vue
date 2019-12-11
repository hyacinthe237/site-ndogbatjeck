<template lang="html">
    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">

                    <div class="login-form">
                        <div class="logo-name text-center">Boukarou</div>
                        <div class="title text-center">Modification mot de passe</div>

                         <form class="_form mt-10" @submit.prevent="reset()">
                            <div class="form-group">
                                 <input type="hidden"
                                     name="token"
                                     v-model="ghost.token">
                             </div>
                             <div class="form-group">
                                 <input type="hidden"
                                     name="email"
                                     v-model="ghost.email">
                             </div>
                             <div class="form-group">
                                 <input type="password"
                                     name="password"
                                     placeholder="Mot de Passe"
                                     v-validate="'required|min:6'"
                                     v-model="ghost.password"
                                     class="form-control input-lg">
                                     <span class="has-error">{{ errors.first('password') }}</span>
                             </div>


                            <div class="form-group">
                                <input type="password"
                                    name="password"
                                    placeholder="Confirmation mot de passe"
                                    v-validate="'required|min:6'"
                                    v-model="ghost.password_confirmation"
                                    class="form-control input-lg">
                                    <span class="has-error">{{ errors.first('password_confirmation') }}</span>
                            </div>


                            <div class="mt-20">
                                <izy-btn :loading="isLoading" :size="'lg'" block elevated>
                                <i class="ion-android-done-all"></i>
                                    Modifier
                                </izy-btn>
                            </div>

                       </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'admin-reset-password',

    props: ['email','token'],

    mounted () {
        this.ghost.email=this.email
        this.ghost.token=this.token
    },

    methods: {
        async reset () {
            const isValid = await this.$validator.validate()
            if (!isValid ) return false;

            this.isLoading = true

            try {
                const response = await webAxios.post('/admin/reset', this.ghost)
                window.location = response.data.route
            } catch (e) {
                console.log(e)
                this.$swal.error(e.response.data)
            }

            this.isLoading = false
        }
    }
}
</script>
