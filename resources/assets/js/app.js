
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('qr', require('./components/QrCode.vue'));
Vue.component('vcard', require('./components/vCard.vue'));
Vue.component('modal-qr', require('./components/ModalQr.vue'));

const app = new Vue({
    el: '#app',
    data: {
        mobileNav: false,
        QrContent: '',
        vCardString: '',

        // I guess this should have its own component
        webCodeType: 'Static',

        // This should have its own component
        latitude: 0,
        longitude: 0,

        // This should have its own component
        recipient: '',
        subject: '',
        emailContents: '',

        // This should have its own component
        ssid: '',
        wifiEncryption: 'WPA',
        wifiPass: '',
        wifiHidden: false
    },

    methods: {
        signOut() {
            document.querySelector('#sign-out').submit()
        },

        toggleMobileMenu() {
            this.mobileNav = ! this.mobileNav
        },

        viewCode(link) {
            swal( Laravel.url + '/dynamic/' + link)
        },

        fireModal(name) {
            this.$refs[name].show = true
        }
    },

    computed: {
        location() {
            return 'geo:' + this.latitude + ',' + this.longitude + ',400'
        },

        email() {
            return `mailto:${this.recipient}?subject=${this.subject}&body=${this.emailContents}`
        },

        wifi() {
            if (this.wifiEncryption == 'nopass') {
                this.wifiPass = ''
            }
            return `WIFI:T:${this.wifiEncryption};S:${this.ssid};P:${this.wifiPass};H:${this.wifiHidden};`
        }
    },

    created() {
        window.app = this
        this.$on('newCard', (data) => {
            console.log(data)
            app.vCardString = data
        })
    }
});
