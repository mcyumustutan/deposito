<template>
  <div class="container mx-auto lg:px-40 px-4">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full md:w-3/3 px-3 mb-6 md:mb-5 m-5">
        <img src="http://www.cappadociaexclusivetravel.com/images/logo.png" />
      </div>

      <div class="w-full md:w-3/3 px-3 mb-6 md:mb-0"></div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <Summary :items="items" :note="note"></Summary>
      </div>
      <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
        <Payment
          @handle-card="handleCard"
          @change-parent="handleAlert"
          :total="total"
          :currency="currency"
        ></Payment>
      </div>
    </div>

    <Alert
      :visible="alertVisible"
      position="top-right"
      color="success"
      title="Success"
      description="Your payment has been successfully processed."
    />
  </div>
</template>

<script>
import Payment from "../../../Components/Payment/Payment";
import Summary from "../../../Components/Payment/Summary";
import Alert from "../../../Components/Alert";

export default {
  props: {
    client: Object,
    form: Object,
  },
  name: "CheckoutPage",
  components: {
    Payment,
    Summary,
    Alert,
  },
  data() {
    return {
      rrr: "",
      items: [
        {
          title: this.client.fullname,
          description: "lorem impsu liwe",
          price: 550,
        },
        {
          title: "Title 2",
          description: "lorem impsu liwe",
          price: 250,
        },
        {
          title: "Title 3",
          description: "lorem impsu liwe",
          price: 150,
        },
      ],
      alertVisible: false,
      total: this.client.amount,
      currency: this.client.currency,
      note: this.client.note,
      isCard: false,
    };
  },
  mounted() {},
  methods: {
    handleAlert() {
      this.alertVisible = true;
      setTimeout(() => {
        this.alertVisible = false;
      }, 4000);
    },
    handleCard() {
      this.isCard = true;
    },
  },
};
</script>