<template>
  <div class="col-span-1 lg:col-span-4 order-first lg:order-last">
    <h4 class="text-3xl text-gray-700 mb-5">Order Summary</h4>

    <div class="p-10 rounded-md shadow-md bg-white">
      <item :key="i" v-for="(item, i) in items" :item="item" />
    </div>

    <p class="p-4 mb-5">
      Note:
      <span class="italic">{{ note }}</span>
    </p>
  </div>
</template>

<script>
import Item from "./Item";
export default {
  name: "Summary",
  props: {
    items: Object,
    note: String,
  },
  components: {
    Item,
  },
  data() {
    return {};
  },
};
</script>