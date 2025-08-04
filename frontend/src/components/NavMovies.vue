<script setup>
import { debounce } from "lodash";
import { computed, ref } from "vue";
import { useRoute } from "vue-router";

const props = defineProps(["genres"]);
const emit = defineEmits(["search", "filter"]);

const route = useRoute();
const isSearchRoute = computed(() => route.path === "/");

//Campo de busca
const search = ref("");
// Filtro de gênero
const selected = ref("");

const menuAberto = ref(false)

function toggleMenu() {
  menuAberto.value = !menuAberto.value
}

const menuClasses = computed(() => {
  return [
    'w-full md:flex md:items-center md:w-auto md:order-1',
    menuAberto.value ? 'block' : 'hidden',
  ]
})

const onSearch = debounce(() => {
  emit("search", search.value);
}, 400);

//Manipula o valor do select manualmente
const onFilter = () => {
  emit("filter", selected.value);
};
</script>
<template>
 <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-full top-0 z-50 shadow-sm">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <!-- Logo ou nome do app -->
    <router-link to="/" class="text-xl font-semibold text-blue-700 dark:text-blue-500">
      TMDB Vue
    </router-link>

    <!-- Ações à direita -->
    <div class="flex items-center gap-4 md:order-2">
      <!-- Campo de busca ou filtro -->
      <div class="relative hidden md:block">
        <template v-if="isSearchRoute">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input
            type="text"
            v-model="search"
            @input="onSearch"
            placeholder="Buscar..."
            class="block w-full ps-10 p-2 text-sm rounded-lg border bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500"
          />
        </template>

        <template v-else>
          <select
            v-model="selected"
            @change="onFilter"
            class="block border py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
          >
            <option value="">Todos os Gêneros</option>
            <option v-for="(genre, index) in props.genres.data" :key="index" :value="genre">
              {{ genre }}
            </option>
          </select>
        </template>
      </div>

      <!-- Botão menu mobile -->
      <button
        @click="toggleMenu"
        class="md:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
        aria-label="Abrir menu"
      >
        <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>

    <!-- Menu de navegação -->
    <div
      :class="menuClasses"
      id="navbar-search"
    >
      <ul class="flex flex-col md:flex-row md:space-x-8 md:mt-0 mt-4 font-medium">
        <li>
          <router-link
            v-if="isSearchRoute"
            to="/favoritos"
            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
          >
            Meus Favoritos
          </router-link>
          <router-link
            v-else
            to="/"
            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
          >
            Filmes
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>

</template>
