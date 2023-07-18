<template>
    <div>
        <div class="column">
            <h2 class="title">General information</h2>

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="first-name">First name</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="firstName" id="first-name">
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="middle-name">Middle name</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="middleName" id="middle-name">
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="last-name">Last name</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="lastName" id="last-name">
                        </p>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label" for="organization">Organization</label>
                <p class="control">
                    <input type="text" class="input" @change="generateCard" v-model="organization" id="organization">
                </p>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label for="name-prefix" class="label">Name prefix</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="namePrefix" id="name-prefix">
                        </p>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label" for="name-suffix">Name suffix</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="nameSuffix" id="name-suffix">
                        </p>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label" for="job">Job position/role</label>
                <p class="control">
                    <input type="text" class="input" @change="generateCard" v-model="job" id="job">
                </p>
            </div>
            <br>
            <h2 class="title">Contact information</h2>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="home-phone">Home phone</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="homePhone" id="home-phone">
                        </p>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label" for="cell-phone">Cellphone</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="cellPhone" id="cell-phone">
                        </p>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label" for="work-phone">Work phone</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="workPhone" id="work-phone">
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="personal-email">Personal E-mail</label>
                        <p class="control">
                            <input type="email" class="input" @change="generateCard" v-model="personalEmail" id="personal-email">
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="work-email">Work E-mail</label>
                        <p class="control">
                            <input type="email" class="input" @change="generateCard" v-model="workEmail" id="work-email">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field">
            <label class="label" for="input">Website:</label>
                <p class="control">
                    <input type="text" id="input" class="input" placeholder="http://" @change="generateCard" v-model="website">
                </p>
            </div>

            <br>
            <h2 class="title">Social media</h2>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="facebook">Facebook</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="facebook" id="facebook">
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="linked-in">Linked in</label>
                        <p class="control">
                            <input type="text" class="input" @change="generateCard" v-model="linkedIn" id="linked-in">
                        </p>
                    </div>
                </div>
            </div> 

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="twitter">Twitter</label>
                        <div class="control">
                            <input type="text" class="input" @change="generateCard" v-model="twitter" id="twitter">
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                firstName: '',
                middleName: '',
                lastName: '',
                organization: '',
                namePrefix: '',
                nameSuffix: '',
                job: '',
                homePhone: '',
                cellPhone: '',
                workPhone: '',
                personalEmail: '',
                workEmail: '',
                website: '',
                facebook: '',
                linkedIn: '',
                twitter: '',
            }
        },

        methods: {
            generateCard() {
                let generator = window.vCard()
                generator.firstName = this.firstName
                generator.middleName = this.middleName
                generator.lastName = this.lastName
                generator.organization = this.organization
                generator.namePrefix = this.namePrefix
                generator.nameSuffix = this.nameSuffix
                generator.job = this.job
                generator.homePhone = this.homePhone
                generator.cellPhone = this.cellPhone
                generator.workPhone = this.workPhone
                generator.personalEmail = this.personalEmail
                generator.workEmail = this.workEmail
                generator.website = this.website
                generator.facebook = this.facebook
                generator.linkedIn = this.linkedIn
                generator.twitter = this.twitter
                this.$emit('newCard', generator.getFormattedString())
            }
        } 
    }
</script>
