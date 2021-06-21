<template>
    <PulsarVue title="Test">
    <div>This is a blank</div>

    <inertia-link :href="route('store')" method="get" as="button" type="button">
      <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
        Button
      </button></inertia-link
    >
  </PulsarVue>
</template>

<script>
import PulsarVue from "../Layouts/Pulsar.vue";

export default {
  methods: {
    mystore() {
      this.form.get(this.route("store"));
      //   axios
      //     .get(route('store'))
      //     .then(function (response) {
      //       // handle success
      //       console.log(response);
      //     })
      //     .catch(function (error) {
      //       // handle error
      //       console.log(error);
      //     })
      //     .then(function () {
      //       // always executed
      //     });
    },
  },
  components: { PulsarVue },
};
</script>
