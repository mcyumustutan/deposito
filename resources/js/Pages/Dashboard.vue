<template>
  <PulsarVue title="Ana Ekran">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-2">
      <div
        class="flex justify-center items-center bg-white shadow-md rounded border border-gray-400 h-60 p-2 align-middle "
        v-for="n in 8"
        :key="n"
      >
        <span class="">{{ n }}</span>
      </div>
    </div>
  </PulsarVue>
</template>  
<style  >
</style>
<script>
import Card from "primevue/card";
import PulsarVue from "../Layouts/Pulsar.vue";

export default {
  components: {
    PulsarVue,
    Card,
  },
};
</script>
