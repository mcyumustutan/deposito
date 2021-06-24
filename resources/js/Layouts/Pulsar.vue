<template>
  <div class="relative min-h-screen md:flex">
    <!-- mobile menu bar -->
    <div class="bg-gray-700 text-blue-800 flex justify-between md:hidden">
      <!-- logo -->
      <a href="#" class="block p-4 font-bold text-gray-200">{{
        $page.props.appName
      }}</a>

      <!-- mobile menu button -->
      <button
        class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700"
        @click="togglesidebar"
      >
        <svg
          class="h-5 w-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </button>
    </div>

    <!-- mysidebar -->
    <div
      class="
        mysidebar
        bg-gray-700
        text-blue-800
        w-60
        space-y-6
        py-3
        inset-y-0
        left-0
        transform
        -translate-x-full
        md:translate-x-0
        transition
        duration-200
        ease-in-out
        shadow-inner
        overflow-y-auto
        fixed
        top-0
        z-40
      "
    >
      <!-- logo -->
      <a
        href="#"
        class="flex items-center space-x-2 px-4 font-bold text-gray-200"
      >
        <breeze-application-logo class="h-9 w-auto text-gray-200" />
        <span class="text-2xl">{{ $page.props.appName }}</span>
      </a>

      <div class="px-4 py-2 mt-2 border-b-2 border-t-2 border-gray-600">
        <span class="text-gray-400">Hoşgldiniz: </span>
        <span class="text-gray-200">{{ $page.props.auth.user.name }}</span>
      </div>
      <!-- nav -->
      <nav>
        <SidebarLink
          v-for="menuItem in menuItems"
          v-bind:key="menuItem"
          :href="route(menuItem.route)"
          :active="myActive(menuItem.route)"
          :icon="menuItem.icon"
          >{{ menuItem.label }}</SidebarLink
        >
      </nav>
    </div>

    <!-- content -->

    <div class="flex-1 xl:pl-60 lg:pl-60 md:pl-60 sm:pl-none">
      <div
        v-if="title"
        class="
          px-5
          py-5
          bg-gray-200
          h-14
          bg-opacity-75
          m-0
          shadow-md
          text-xl
          font-bold
          text-gray-800
          justify-end
          flex
          gap-4
        "
      >
        <a class="" title="Siteye Git" href=""
          ><i class="pi pi-external-link"></i
        ></a>

        <inertia-link :href="route('logout')" method="post" title="Çıkış">
          <i class="pi pi-sign-out" style="fontsize: 2rem"></i>
        </inertia-link>
      </div>

      <div class="p-5 text-gray h-screen">
        <div class="p-5">
          <h1 class="text-2xl text-blue-900">
            {{ title }}
          </h1>
          <div class="grid grid-cols-1 divide-y divide-blue-900 mb-8 mt-2">
            <div></div>
            <div></div>
          </div>
          <flash-messages />
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import SidebarLink from "@/Components/SidebarLink";
import FlashMessages from "@/Components/FlashMessages";
import { PrimeIcons } from "primevue/api";
export default {
  props: ["title"],
  methods: {
    togglesidebar() {
      // grab everything we need
      const btn = document.querySelector(".mobile-menu-button");
      const mysidebar = document.querySelector(".mysidebar");
      mysidebar.classList.toggle("-translate-x-full");
    },
    myActive(item) {
      let currentUrl = route().current().split(".");
      if (item.includes(currentUrl[0])) {
        return true;
      }
      return false;
    },
  },
  data() {
    return {
      menuItems: [
        {
          route: "dashboard",
          icon: PrimeIcons.MICROSOFT,
          label: "Ana Ekran",
        },
        {
          route: "client.index",
          icon: PrimeIcons.USER,
          label: "Müşteriler",
        },
      ],
    };
  },
  name: "Pulsar",
  components: {
    BreezeApplicationLogo,
    BreezeNavLink,
    BreezeResponsiveNavLink,
    SidebarLink,
    FlashMessages,
  },
};

/*
{
  route: "test",
  icon: PrimeIcons.APPLE,
  label: "Test",
},
{
  route: "test3",
  icon: PrimeIcons.ANDROID,
  label: "Test 3",
},
{
  route: "page.index",
  icon: PrimeIcons.LIST,
  label: "Pages",
},
*/
</script>