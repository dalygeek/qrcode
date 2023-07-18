<template>
    <div>
        <canvas class="qr-code"></canvas>
        <form action="download" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="codeData" :value="generateContent">
            <div class="field">
                <label for="size" class="label">Size</label>
                <p class="control" style="max-width: 300px">
                    <input type="number" class="input" id="size" min="100" max="5000" name="size" value="250">
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-primary" target="_blank">Export to image</button>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            content: {
                required: true,
                type: String
            },
            type: {
                required: false,
                default: 'text',
            },
            padding: {
                type: Number,
                required: false,
                default: null
            },
            size: {
                type: Number,
                required: false,
                default: 300
            }
        },

        data() {
            return {
                QrCode: {}
            }
        },

        mounted() {
            this.QrCode = new QRious({
                element: this.$el.querySelector('canvas'),
                value: this.generateContent,
                size: this.size,
                padding: this.padding,
                foreground:"#25235b"
            })
        },

        methods: {
            updateQrCode() {
                this.QrCode.value = this.generateContent
            }
        },

        watch: {
            content() {
                this.updateQrCode()
            }
        },

        computed: {
            generateContent() {
                switch (this.type){
                    case 'text':
                        return '' + this.content
                        break
                    case 'website':
                        return 'http://' + this.content
                        break
                    case 'vcard':
                        return 'vcard'
                        break
                    default:
                        return this.content
                        break
                }
            },

            csrf() {
                return Laravel.csrfToken
            }
        }
    }
</script>
