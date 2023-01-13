<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <AuthLayout>
    <Head title="Login" />

    <section>
      <form @submit.prevent="submit">
        <div class="place-self-center">
          <Link href="/">
            <ApplicationLogo class="w-20 h-20 text-gray-500 fill-current" />
          </Link>
        </div>

        <div class="text-center">
          <p>Hi there! <br />Login to your dashboard</p>
        </div>

        <div>
          <InputLabel for="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            class="block w-full mt-1"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput
            id="password"
            type="password"
            class="block w-full mt-1"
            v-model="form.password"
            required
            autocomplete="current-password"
          />

          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="block mt-4">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" />
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
          </label>
        </div>

        <PrimaryButton
          class="grid"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </PrimaryButton>

        <div class="flex items-center justify-between mt-4">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >
            Forgot your password?
          </Link>

          <Link
            :href="route('register')"
            class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >
            Create a new account
          </Link>
        </div>
      </form>
    </section>
  </AuthLayout>
</template>

<style scoped>
section {
  height: 100%;
  display: grid;
}

section > form {
  display: grid;
  min-width: 70%;
  padding: 2rem;
}

@media screen and (min-width: 768px) {
  section {
    justify-items: end;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    background-image: url("");
  }

  section > form {
    min-width: 30%;
    background-color: rgb(250, 249, 249);
  }
}

@media screen and (max-width: 768px) {
  section {
    place-items: center;
  }
}

form {
  gap: 0.5rem;
  color: rgb(67, 67, 67);
}
</style>
