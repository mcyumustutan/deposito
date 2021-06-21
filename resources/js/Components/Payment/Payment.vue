<template>
  <div class="col-span-1 lg:col-span-6">
    <h4 class="text-3xl text-gray-700 mb-5">Payment information</h4>
    <div class="p-10 rounded-md shadow-md bg-white">
      
      <div class="mb-6">
        <div id="iyzipay-checkout-form" class="responsive my-5"></div>
        <!-- <label class="block mb-3 text-gray-600" for="">Name on card</label>
        <input
          type="text"
          class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"
        /> -->
      </div>
      <!-- <div class="mb-6">
        <label class="block mb-3 text-gray-600" for="">Card number</label>
        <input
          type="tel"
          class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"
        />
      </div>
      <div class="mb-6 flex flex-wrap -mx-3w-full">
        <div class="w-2/3 px-3">
          <label class="block mb-3 text-gray-600" for=""
            >Expiraion date MM / YY</label
          >
          <div class="flex">
            <input
              type="number"
              placeholder="month"
              class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest mr-6"
            />

            <input
              type="number"
              placeholder="year"
              class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"
            />
          </div>
        </div>
        <div class="w-1/3 px-3">
          <label class="block mb-3 text-gray-600" for="">CVC</label>
          <input
            type="tel"
            class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"
          />
        </div>
      </div>
      <div class="mb-6 text-right">
        <span class="text-right font-bold"
          >Total: {{ total }} {{ currency }}</span
        >
      </div>
      <div>
        <p
          class="text-center py-4 bg-blue-100 border-red-500 text-blue-700 text-gray-700 mb-5 font-semibold"
        >
          You are paying for deposit.
        </p>
        <button
          @click="finishPayment"
          class="w-full text-center px-4 py-3 bg-blue-500 rounded-md shadow-md text-white font-semibold"
        >
          Confirm payment for {{ currency }} {{ total }}
        </button>
      </div> -->
    </div>
  </div>
</template>
<script>
export default {
  name: "Payment",
  props: {
    total: Number,
    currency: String,
  },
  methods: {
    finishPayment() {
      this.$emit("change-parent");
    },
  },
};
</script>