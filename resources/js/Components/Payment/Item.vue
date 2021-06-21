<template>
  <div class="grid grid-cols-8 overflow-hidden col-gap-6 mb-5">
    <div class="col-span-5">
      <div class="flex">
        <h6 class="text-sm font-semibold text-gray-800 flex-grow">{{ item.title }}</h6>
      </div>
      <p
        class="text-xs truncate text-gray-600"
      >{{item.description}}</p>
      <span class="text-sm text-gray-800">{{ item.price }} USD</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Item",
  props: {
    item: Object
  }
};
</script>