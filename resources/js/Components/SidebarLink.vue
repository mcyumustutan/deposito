<template>
  <inertia-link :href="href" :class="classes">
    <div class="flex items-center justify-start">
      <i class="p-1" v-if="icon" :class="icon"></i> <slot />
    </div>
  </inertia-link>
</template>

<script>
export default {
  props: ["href", "active", "icon"],

  computed: {
    classes() {
      return this.active
        ? " transition duration-300 ease-in-out block px-4 py-2 mt-2 text-sm font-semibold md:mt-0 shadow-md  focus:outline-none focus:shadow-outline bg-blue-900 text-blue-100 hover:bg-blue-900 hover:text-white aaaaaaaaaaa"
        : " transition duration-300 ease-in-out block px-4 py-2 mt-2 text-sm font-semibold focus:outline-none focus:shadow-outline bg-transparent md:mt-0 text-gray-200 hover:text-white hover:shadow-md   hover:bg-blue-900  bbbbbbbbbbb";
    },
  },
};
</script>
