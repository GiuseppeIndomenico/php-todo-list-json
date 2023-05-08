const { createApp } = Vue

createApp({
    data() {
        return {
            message: 'La mia lista di cose da fare!',
            toDoList: [],
            apiUrl: 'server.php',
            toDoItem: {
                task: '',
                done: false
            }
        }
    },

    methods: {
        readList() {
            axios.get(this.apiUrl).then((res) => {
                //   console.log(res.data)
                this.toDoList = res.data
            })
        },
        updateList() {
            const data = {
                toDoItem: {
                    task: this.toDoItem.task,
                    done: false
                }
            };
            // console.log(data);
            axios.post(this.apiUrl, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((res) => {
                console.log(res.data);
                this.toDoItem.task = '';
                this.toDoList = res.data;
            })
        }


    },
    mounted() {
        this.readList();
    }

}).mount('#app')