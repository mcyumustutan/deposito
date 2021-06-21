<template>
  <PulsarVue title="Müşteriler">
    <div class="card mb-4">
      <Toolbar class="p-mb-4">
        <template #left>
          <button
            class="bg-green-500 text-white p-2 rounded hover:shadow mr-1 hover:bg-green-600 transition duration-300 ease-in-out"
            @click="$inertia.get(route('client.create'))"
          >
            Yeni Müşteri Ekle
          </button>
        </template>

        <template #right> </template>
      </Toolbar>
    </div>

    <DataTable
      :value="clients"
      :paginator="true"
      class="p-datatable-sm"
      showGridlines
      :rows="10"
      dataKey="id"
      v-model:filters="filters2"
      filterDisplay="menu"
      :loading="loading1"
      responsiveLayout="scroll"
      :globalFilterFields="[
        'fullname',
        'amount',
        'email',
        'phone',
        'created_at',
      ]"
    >
      <template #header>
        <div class="p-d-flex p-jc-between">
          <Button
            type="button"
            icon="pi pi-filter-slash"
            label="Temizle"
            class="p-button-outlined"
            @click="clearFilter1()"
          />
          <span class="p-input-icon-left">
            <i class="pi pi-search" />
            <InputText v-model="filters2['global'].value" placeholder="Ara" />
          </span>
        </div>
      </template>
      <template #empty> No customers found. </template>
      <template #loading> Loading customers data. Please wait. </template>
      <Column
        sortable="true"
        field="fullname"
        header="Tam Ad"
        style="min-width: 12rem"
      >
        <template #body="{ data }">
          {{ data.fullname }}
        </template>
      </Column>
      <Column sortable="true" field="email" header="E-Posta"></Column>
      <Column sortable="true" field="phone" header="Tel"></Column>
      <Column sortable="true" field="amount" header="Tutar"></Column>
      <Column
        sortable="true"
        field="status"
        header="Durum"
        :showFilterMenu="true"
      >
        <template #body="{ data }">
          <span :class="'customer-badge status-' + data.status">{{
            data.status
          }}</span>
        </template>
        <template #filter="{ filterModel, filterCallback }">
          <Dropdown
            v-model="filterModel.value"
            @change="filterCallback()"
            :options="statuses"
            placeholder="Durum"
            class="p-column-filter"
            :showClear="true"
          >
            <template #value="slotProps">
              <span
                :class="'customer-badge status-' + slotProps.value"
                v-if="slotProps.value"
                >{{ slotProps.value }}</span
              >
              <span v-else>{{ slotProps.placeholder }}</span>
            </template>
            <template #option="slotProps">
              <span :class="'customer-badge status-' + slotProps.option">{{
                slotProps.option
              }}</span>
            </template>
          </Dropdown>
        </template>
      </Column>
      <Column
        sortable="true"
        header="Oluşturuldu"
        filterField="created_at"
        style="min-width: 10rem"
      >
        <template #body="{ data }">
          <!-- {{ formatDate(data.created_at) }} -->
          {{ data.created_at }}
        </template>
      </Column>
      <Column header="İşlemler" filterField="id">
        <template #body="{ data }">
          <!-- {{ formatDate(data.created_at) }} -->
          <inertia-link :href="route('client.show', data.id)" :class="classes"
            ><button
              class="text-xs bg-blue-500 hover:bg-blue-700 border-blue-200 hover:border-blue-700 border-4 text-white py-1 px-2 rounded"
            >
              Detaylar
            </button>
          </inertia-link>
        </template>
      </Column>
      <template #paginatorLeft>
        <!-- <Button type="button" icon="pi pi-refresh" class="p-button-text" /> -->
      </template>
      <template #paginatorRight>
        <!-- <Button type="button" icon="pi pi-cloud" class="p-button-text" /> -->
      </template>
    </DataTable>
  </PulsarVue>
</template>

<script>
import PulsarVue from "../../../Layouts/Pulsar.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Calendar from "primevue/calendar";
import Toolbar from "primevue/toolbar";
import Dropdown from "primevue/dropdown";

import { FilterMatchMode, FilterOperator } from "primevue/api";
export default {
  props: {
    data: String,
  },
  data() {
    return {
      statuses: ["waiting", "success", "cancelled"],
      clients: null,
      globalSearch: null,
      filters2: {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        amount: { value: null, matchMode: FilterMatchMode.CONTAINS },
        fullname: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        email: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        created_at: { value: null, matchMode: FilterMatchMode.EQUALS },
        phone: { value: null, matchMode: FilterMatchMode.CONTAINS },
        status: { value: null, matchMode: FilterMatchMode.EQUALS },
      },
    };
  },
  methods: {
    clearFilter1() {
      this.filters2["global"].value = "";
    },
    rowClass(data) {
      return data.slug === "alba-bergnaum" ? "row-accessories" : null;
    },
    formatDate(value) {
      console.log(value);
      //return value
      value = new Date(value);
      return value.toLocaleDateString("en-US", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
      });
    },
  },
  components: {
    PulsarVue,
    DataTable,
    Column,
    ColumnGroup,
    Button,
    InputText,
    FilterMatchMode,
    FilterOperator,
    Calendar,
    Toolbar,
    Dropdown,
  },
  created() {
    this.clients = JSON.parse(this.data).data;
  },
  mounted() {},
};
</script>