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
                    done: ''
                }
            };
            // console.log(data);
            axios.post(this.apiUrl, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((res) => {
                //    console.log(res.data);
                this.toDoItem.task = '';
                this.toDoItem.done = false
                this.toDoList = res.data;
            })
        },
        toggleTaskDone(index) {
            const data = {
                updateItem: index
            };
            // console.log(data);
            axios.post(this.apiUrl, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((res) => {
                //  console.log(res.data);

                this.toDoList = res.data;
            })
        },
        deleteTask(index) {
            const data = {
                deleteItem: index
            };
            // console.log(data);
            axios.post(this.apiUrl, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((res) => {
                //  console.log(res.data);

                this.toDoList = res.data;
            })
        }


    },
    mounted() {
        this.readList();
    }

}).mount('#app')