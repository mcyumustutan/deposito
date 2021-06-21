<template>
  <label
    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
    :for="for"
  >
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </label>
</template>

<script>
export default {
  props: ["value", "for"],
};
</script>
