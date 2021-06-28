<template>
  <PulsarVue title="Müşteri Bilgileri">
    <div class="space-y-4 mb-4">
      <a
        class="
          block
          text-sm
          bg-blue-500
          hover:bg-blue-700
          border-blue-200
          hover:border-blue-700
          border-4
          text-white
          py-1
          px-2
          rounded
        "
        target="_blank"
        :href="url"
        >Müşteri Ödeme Linki</a
      >
    </div>

    <form @submit.prevent="update">
      <div>
        <p :class="'customer-badge status-' + this.client.status">
          {{ this.client.status }}
        </p>
      </div>

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
          <div class="md:w-1/4 px-3">
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
          <div class="md:w-1/4 px-3 md:mb-0">
            <BreezeLabel for="deposit" value="Deposit"></BreezeLabel>
            <myInput
              class="w-full"
              id="deposit"
              type="text"
              placeholder="$"
              v-model="form.amount"
            />
          </div>

          <div class="md:w-1/4 px-3 md:mb-0">
            <BreezeLabel for="total" value="Total"></BreezeLabel>
            <myInput
              class="w-full"
              id="total"
              type="text"
              placeholder="$"
              v-model="form.total"
            />
          </div>

          <div class="md:w-1/4 px-3">
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
              v-model="form.status"
            >
              <option value="waiting">waiting</option>
              <option value="cancelled">cancelled</option>
              <option readonly value="success">success</option>
            </select>
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="px-3 w-full">
            <BreezeLabel for="note" value="Note"></BreezeLabel>

            <Editor v-model="form.note" editorStyle="height: 320px" />
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 md:mb-0">
            <button
              v-show="isDisabled"
              type="submit"
              class="
                bg-green-500
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
              Güncelle
            </button>
          </div>
        </div>
      </div>
    </form>
  </PulsarVue>
</template>

<script>
import PulsarVue from "../../../Layouts/Pulsar.vue";
import BreezeLabel from "../../../Components/Label.vue";
import myInput from "../../../Components/Input.vue";
import Editor from "primevue/editor";
export default {
  created() {
    document.title = document.title + " - MüşteriMüşteri Bilgileri";
  },
  props: {
    client: Object,
    url: String,
    decrypted: String,
  },
  data() {
    return {
      form: this.$inertia.form({
        fullname: this.client.fullname,
        name: this.client.name,
        surname: this.client.surname,

        email: this.client.email,
        phone: this.client.phone,
        country: this.client.country,
        city: this.client.city,
        address: this.client.address,
        amount: this.client.amount,
        total: this.client.total,
        currency: this.client.currency,
        note: this.client.note,
        status: this.client.status,
      }),
    };
  },
  methods: {
    changed(value) {
      console.log(value);
      this.form.city = value;
    },
    update() {
     // if (this.client.status != "success") {
        this.form.put(this.route("client.update", this.client.id));
     // }
    },
    destroy() {
      if (confirm("Are you sure you want to delete this contact?")) {
        this.$inertia.delete(this.route("contacts.destroy", this.client.id));
      }
    },
    restore() {
      if (confirm("Are you sure you want to restore this contact?")) {
        this.$inertia.put(this.route("contacts.restore", this.client.id));
      }
    },
  },
  computed: {
    isDisabled() {
      return this.client.status === "success" ? false : true;
    },
  },
  components: { PulsarVue, myInput, BreezeLabel, Editor },
};
</script> 
