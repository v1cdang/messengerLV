<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-contact-mail</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Messages</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="indigo"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>Messenger</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col class="text-center">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Company Name</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="company in companies" v-bind:key="company">
                  <td>{{ company.id }}</td>
                  <td>{{ company.company_name }}</td>
                </tr>
              </tbody>
            </table>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
    <v-footer
      color="indigo"
      app
    >
      <span class="white--text">&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import axios from "axios";

  export default {
    props: {
      source: String,
    },
    data () {
      return {
        loading: false,
        companies: null
      }
    },
    mounted () {
      this.loading = true;
      axios
        .get('http://127.0.0.1:8000/api/companies')
        .then(response => (this.companies = response.data.data))
        .catch(error => console.log(error))
        .finally(() => this.loading = false)
    }
  }
</script>
