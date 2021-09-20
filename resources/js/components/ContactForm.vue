<template>
    <div class="contact-form">
        <h3>
            Send us a message
        </h3>

        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" v-bind:class="{ 'is-invalid': $v.form.first_name.$dirty ? $v.form.first_name.$error : false }" v-model="form.first_name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" v-bind:class="{ 'is-invalid': $v.form.last_name.$dirty ? $v.form.last_name.$error : false }" v-model="form.last_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-bind:class="{ 'is-invalid': $v.form.email.$dirty ? $v.form.email.$error : false }" v-model="form.email">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <label class="text-sm text-muted float-right">Optional</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" v-bind:class="{ 'is-invalid': $v.form.subject.$dirty ? $v.form.subject.$error : false }" v-model="form.subject">
            </div>
            <div class="form-group">
                <label>Message</label>
                <label class="text-sm text-muted float-right">Max. 500 characters</label>
                <textarea class="form-control" rows="6" maxlength="500" v-bind:class="{ 'is-invalid': $v.form.message.$dirty ? $v.form.message.$error : false }" v-model="form.message"></textarea>
            </div>

            <button class="btn btn-primary float-right">Submit</button>
        </form>

        <notifications />
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    import { required, email } from 'vuelidate/lib/validators'

    export default {
        mixins: [validationMixin],
        validations: {
            form: {
                first_name: {
                    required,
                },
                last_name: {
                    required,
                },
                email: {
                    required,
                    email,
                },
                subject: {
                    required,
                },
                message: {
                    required,
                },
            }
        },
        data() {
            return {
                form: {
                    first_name: "",
                    last_name: "",
                    email: "",
                    phone: "",
                    subject: "",
                    message: "",
                }
            }
        },
        methods: {
            submit() {
                this.$v.form.$touch()

                if (this.$v.form.$anyError) {
                    return;
                }

                axios.post('/ajax/send-contact-email', this.form)
                    .then((response) => {
                        if (response.data.status == 'success') {
                            this.$notify({
                                type: 'success',
                                text: 'Thanks for contacting us!'
                            })

                            this.clearForm();
                        }
                    })
                    .catch(() => {
                        this.$notify({
                            type: 'error',
                            text: 'Something went wrong! Play try again.'
                        })
                    })
            },

            clearForm() {
                this.form = {
                    first_name: "",
                    last_name: "",
                    email: "",
                    phone: "",
                    subject: "",
                    message: "",
                }
            }
        }
    }
</script>
