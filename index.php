<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>to do list php</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>
    <div class="bg-primary-subtle vh-100 pt-5" id="app">
        <div class="container d-flex align-items-center justify-content-center mb-5">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class=" fw-bold">
                        {{ message }}
                    </h3>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div v-for="(todo, index) in toDoList" :key="index" class="border p-2 ms-2 col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="fw-semibold">
                                        {{index + 1}}
                                    </span> :
                                    <span :class="{'text-decoration-line-through':todo.done}">
                                        {{todo.task}}
                                    </span>
                                </div>
                                <div class="me-3">
                                    <button @click="toggleTaskDone(index)"
                                        class="btn btn-outline-success me-2 rounded-5">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                    <button @click="deleteTask(index)" class="btn btn-outline-danger rounded-5">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between">
                        <input placeholder="inserisci nuova task qui" v-model="toDoItem.task" @keyup.enter="updateList"
                            type="text">
                        <button class="btn btn-outline-primary" @click="updateList">Aggiungi</button>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <script src="./script/script.js"></script>
</body>

</html>