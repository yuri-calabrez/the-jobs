export default {
    methods: {
        clearData() {
            this.data = {};
        },
        closeForm() {
            this.visible = false;
            this.clearData();
        }
    }
}