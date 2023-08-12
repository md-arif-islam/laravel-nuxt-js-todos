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
            {{ todos }}
            <div class="flex mb-4 items-center">
              <p class="flex-grow text-gray-600">Content</p>
              <button class="btn bg-gray-300 hover:bg-gray-400 text-gray-700">
                Not Done
              </button>
              <button
                class="btn bg-green-500 hover:bg-green-600 text-white ml-2"
              >
                Done
              </button>
              <button class="btn bg-red-500 hover:bg-red-600 text-white ml-2">
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
      console.log("Submit");
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
