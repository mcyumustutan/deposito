<template>
  <PulsarVue title="Yeni Müşteri Ekle">
    <form @submit.prevent="submit">
      <div
        class="
          bg-white
          shadow-md
          rounded
          px-8
          pt-6
          pb-8
          mb-4
          flex flex-col
          my-2
        "
      >
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3">
            <BreezeLabel for="firstname" value="First Name"></BreezeLabel>
            <myInput
              class="w-full"
              id="firstname"
              type="text"
              placeholder="Jane"
              v-model="form.name"
            />
          </div>
          <div class="md:w-1/2 px-3">
            <BreezeLabel for="lastname" value="Last Name"></BreezeLabel>
            <myInput
              class="w-full"
              id="lastname"
              type="text"
              placeholder="Doe"
              v-model="form.surname"
            />
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3">
            <BreezeLabel for="phone" value="Phone"></BreezeLabel>
            <myInput
              class="w-full"
              id="phone"
              type="text"
              placeholder="Jane"
              v-model="form.phone"
            />
          </div>
          <div class="md:w-1/2 px-3">
            <BreezeLabel for="email" value="E-Mail"></BreezeLabel>
            <myInput
              class="w-full"
              id="email"
              type="text"
              placeholder="Jane"
              v-model="form.email"
            />
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/4 px-3">
            <BreezeLabel for="city" value="City"></BreezeLabel>
            <myInput
              class="w-full"
              id="city"
              type="text"
              placeholder="Albuquerque"
              v-model="form.city"
            />
          </div>
          <div class="md:w-1/4 px-3">
            <BreezeLabel for="state" value="State"></BreezeLabel>
            <div class="relative">
              <myInput
                class="w-full"
                id="state"
                type="text"
                placeholder="Albuquerque"
                v-model="form.country"
              />
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <BreezeLabel for="address" value="Address"></BreezeLabel>
            <myInput
              class="w-full"
              type="text"
              placeholder="90210"
              v-model="form.address"
            />
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/3 px-3">
            <BreezeLabel for="currency" value="Curreny"></BreezeLabel>
            <select
              class="
                w-full
                border-gray-300
                focus:border-indigo-300
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                rounded-md
                shadow-sm
              "
              id="currency"
              name="currency"
              v-model="form.currency"
            >
              <option value="usd">USD</option>
              <option value="eur">EURO</option>
              <option value="tl">TRY</option>
            </select>
          </div>
          <div class="md:w-1/3 px-3 md:mb-0">
            <BreezeLabel for="deposit" value="Deposit"></BreezeLabel>
            <myInput
              class="w-full"
              id="deposit"
              type="text"
              placeholder="$"
              v-model="form.amount"
            />
          </div>

          <div class="md:w-1/3 px-3 md:mb-0">
            <BreezeLabel for="total" value="Total"></BreezeLabel>
            <myInput
              class="w-full"
              id="total"
              type="text"
              placeholder="$"
              v-model="form.total"
            />
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="px-3 w-full">
            <BreezeLabel for="note" value="Note"></BreezeLabel>
            <textarea
              id="note"
              class="
                resize-none
                w-full
                border-gray-300
                focus:border-indigo-300
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                rounded-md
                shadow-sm
              "
              v-model="form.note"
            ></textarea>
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 md:mb-0">
            <button
              type="submit"
              class="
                bg-blue-500
                text-white
                p-2
                rounded
                hover:shadow
                mr-1
                hover:bg-green-600
                transition
                duration-300
                ease-in-out
              "
            >
              Kaydet
            </button>
          </div>
        </div>
      </div>
    </form>
  </PulsarVue>
</template>

<script>
import PulsarVue from "../../../Layouts/Pulsar.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import myInput from "../../../Components/Input.vue";
import BreezeLabel from "../../../Components/Label.vue";
export default {
  mounted() {
    document.title = document.title + " - Yeni Müşteri Ekle";
  },
  setup() {
    const form = reactive({
      fullname: null,
      name: null,
      surname: null,

      email: null,
      phone: null,
      country: null,
      city: null,
      address: null,
      amount: null,
      total: null,
      currency: null,
      note: null,
    });

    function submit() {
      Inertia.post(route("client.store"), form);
    }

    return { form, submit };
  },
  methods: {},
  components: { PulsarVue, myInput, BreezeLabel },
};
</script> 
