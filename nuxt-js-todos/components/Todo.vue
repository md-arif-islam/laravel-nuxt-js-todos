<!-- Please remove this file from your project -->
<template>
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0"
  >
    <div class="w-full">
      <!-- component -->
      <div
        class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans"
      >
        <div
          class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg"
        >
          <div class="mb-4">
            <h1 class="font-bold text-3xl text-gray-600 text-center">
              Todo List
            </h1>
            <div class="flex mt-4">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                placeholder="Add Todo"
              />

              <button
                class="flex-no-shrink p-2 border-2 rounded-lg text-teal border-teal text-white bg-blue-500 hover:bg-blue-700"
              >
                Add
              </button>
            </div>
          </div>
          <div>
            <div class="flex mb-4 items-center">
              <!-- <p :class="[todo.is_done ? 'line-through text-green-600' : '', `w-full text-grey-darkest font-semibold text-gray-600`]">{{ todo.content }}</p> -->
              <p class="w-full text-grey-darkest font-semibold text-gray-600">
                Content
              </p>

              <button
                class="flex-no-shrink w-1/3 p-2 ml-4 mr-2 border-2 rounded-lg border-grey"
              >
                Not Done
              </button>

              <button
                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded-lg border-green text-white bg-green-500 hover:bg-green-700"
              >
                Done
              </button>

              <button
                class="flex-no-shrink p-2 ml-2 border-2 rounded-lg text-red border-red text-white bg-red-500 hover:bg-red-700"
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
};
</script>