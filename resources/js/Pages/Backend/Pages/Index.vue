<template>
  <PulsarVue title="Sayfalar">
    <div class="card mb-4">
      <Toolbar class="p-mb-4">
        <template #left>
          <button
            class="bg-green-500 text-white p-2 rounded hover:shadow mr-1 hover:bg-green-600 transition duration-300 ease-in-out "
            @click="$inertia.get(route('page.create'))"
          >
            Yeni Ekle
          </button>
        </template>

        <template #right> </template>
      </Toolbar>
    </div>

    <DataTable
      :value="pages"
      :paginator="true"
      class="p-datatable-sm"
      showGridlines
      :rows="10"
      dataKey="id"
      v-model:filters="filters2"
      filterDisplay="menu"
      :loading="loading1"
      responsiveLayout="scroll"
      :globalFilterFields="['title', 'slug', 'lang', 'created_at']"
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
        field="title"
        header="Başlık"
        style="min-width: 12rem"
      >
        <template #body="{ data }">
          {{ data.title }}
        </template>
      </Column>
      <Column sortable="true" field="ordinal" header="Sıralama"></Column>
      <Column
        sortable="true"
        field="lang"
        header="Dil"
        :showFilterMenu="true"
        style="min-width: 12rem"
      >
        <template #body="{ data }">
          <span :class="'customer-badge status-' + data.lang">{{
            data.lang
          }}</span>
        </template>
        <template #filter="{ filterModel, filterCallback }">
          <Dropdown
            v-model="filterModel.value"
            @change="filterCallback()"
            :options="statuses"
            placeholder="Dil"
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
        header="Oluşturuldu"
        filterField="created_at"
        style="min-width: 10rem"
      >
        <template #body="{ data }">
          <!-- {{ formatDate(data.created_at) }} -->
          {{ data.created_at }}
        </template>
      </Column>
      <Column
        header="İşlemler"
        filterField="id"
      >
        <template #body="{ data }">
          <!-- {{ formatDate(data.created_at) }} -->
          {{ data.created_at }}
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
      statuses: ["tr", "en"],
      pages: null,
      globalSearch: null,
      filters2: {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        title: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        slug: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        created_at: { value: null, matchMode: FilterMatchMode.EQUALS },
        lang: { value: null, matchMode: FilterMatchMode.EQUALS },
      },
    };
  },
  methods: {
    initFilters1() {
      this.filters1 = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        title: {
          operator: FilterOperator.AND,
          constraints: [
            { value: null, matchMode: FilterMatchMode.STARTS_WITH },
          ],
        },
        slug: {
          operator: FilterOperator.AND,
          constraints: [
            { value: null, matchMode: FilterMatchMode.STARTS_WITH },
          ],
        },
        created_at: {
          operator: FilterOperator.AND,
          constraints: [{ value: null, matchMode: FilterMatchMode.DATE_IS }],
        },
        lang: {
          operator: FilterOperator.OR,
          constraints: [{ value: null, matchMode: FilterMatchMode.EQUALS }],
        },
      };
    },
    clearFilter1() {
      this.initFilters1();
    },
    rowClass(data) {
      return data.slug === "alba-bergnaum" ? "row-accessories" : null;
    },
    stockClass(data) {
      return [
        {
          outofstock: data.quantity === 0,
          lowstock: data.quantity > 0 && data.quantity < 10,
          instock: data.quantity > 10,
        },
      ];
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
    this.initFilters1();
    this.pages = JSON.parse(this.data).data;
  },
  mounted() {},
};
</script>
<style scoped>
</style>