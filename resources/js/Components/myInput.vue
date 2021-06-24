<template>
  <div>
    <input
      class="
        appearance-none
        block
        w-full
        bg-grey-lighter
        text-grey-darker
        border border-red
        rounded
        py-3
        px-4
        mb-3
      "
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      ref="input"
    />
  </div>
</template>

<script>
export default {
  props: ["modelValue"],

  emits: ["update:modelValue"],

  methods: {
    focus() {
      this.$refs.input.focus();
    },
  },
};
</script>

