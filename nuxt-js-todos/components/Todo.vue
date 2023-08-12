<template>
  <div
    class="relative flex items-top justify-center min-h-screen bg-light sm:items-center sm:pt-0"
  >
    <div class="w-full">
      <div class="h-100 w-full flex items-center justify-center bg-light">
        <div
          class="card rounded-lg shadow-lg p-6 m-4 w-full lg:w-3/4 lg:max-w-full"
        >
          <div class="mb-4">
            <h1 class="font-bold text-3xl text-gray-700 text-center mb-6">
              Todo List
            </h1>
            <div class="flex mt-4">
              <input
                class="flex-grow shadow-md appearance-none border rounded-md py-2 px-3 mr-4 text-gray-600 bg-gray-100"
                placeholder="Add Todo"
                v-model="content"
              />
              <button
                class="btn bg-blue-500 hover:bg-blue-600 text-white"
                @click="addTodo"
              >
                Add
              </button>
            </div>
          </div>
          <div>
            <div
              class="flex mb-4 items-center"
              v-for="(todo, index) in todos"
              :key="todo.id"
            >
              <p
                :class="[
                  todo.is_done ? 'line-through text-green-600' : '',
                  `w-full text-grey-darkest font-semibold text-gray-600`,
                ]"
                class="flex-grow text-gray-600"
              >
                {{ todo.content }}
              </p>

              <button
                v-if="todo.is_done"
                class="btn bg-gray-300 hover:bg-gray-400 text-gray-700"
                @click="updateTodoStatus(todo, index)"
              >
                Not Done
              </button>
              <button
                v-else
                class="btn bg-green-500 hover:bg-green-600 text-white ml-2"
                @click="updateTodoStatus(todo, index)"
              >
                Done
              </button>
              <button
                class="btn bg-red-500 hover:bg-red-600 text-white ml-2"
                @click="deleteTodo(todo, index)"
              >
                Remove
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NuxtJSTodo",
  data() {
    return {
      content: "",
      todos: [],
    };
  },

  methods: {
    addTodo() {
      this.$axios
        .post("http://127.0.0.1:8000/api/todos", { content: this.content })
        .then((res) => {
          this.todos.unshift(res.data);
          this.content = "";
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {});
    },

    updateTodoStatus(todo, index) {
      this.$axios
        .put(`http://127.0.0.1:8000/api/todos/${todo.id}`)
        .then((res) => {
          this.todo[index].is_done = res.data.is_done;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {});
    },

    deleteTodo(todo, index) {
      this.$axios
        .delete(`http://127.0.0.1:8000/api/todos/${todo.id}`)
        .then((res) => {
          if (res.data == true) {
            this.todos.splice(index, 1);
          }
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {});
    },
  },

  async fetch() {
    this.todos = await fetch("http://127.0.0.1:8000/api/todos").then((res) =>
      res.json()
    );
  },
};
</script>

<style scoped>
.bg-light {
  background-color: #f7f7f7;
}
.card {
  background-color: #fff;
  border: 1px solid #e0e0e0;
}
.btn {
  display: inline-block;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 0.375rem;
  transition: background-color 0.3s ease;
  font-weight: 500;
  cursor: pointer;
  outline: none;
}
</style>
