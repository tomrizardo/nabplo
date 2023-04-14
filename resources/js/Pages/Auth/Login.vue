<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
    <div class="w-screen min-h-[35rem]">

    
        <div v-if="status" class="mb-4 text-sm font-medium text-center text-green-600">
            {{ status }}
        </div>
        <div class="max-w-lg mx-auto  mt-10 sm:mt-40">
            <div class="text-3xl mb-2 text-center font-medium text-blue-600">
                Welcome Back
            </div>
            <div class="text-center mb-10 text-sm">
                Please Login to your account
            </div>
        <form @submit.prevent="submit" class="sm:p-0 p-2">
            <div>
                <InputLabel for="email" value="Email" class="font-medium text-gray-500 text-sm"/>
                <TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" class="font-medium text-sm"/>
                <TextInput id="password" type="password" class="block w-full mt-1 text-gray-500 " v-model="form.password" required autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

     

            <div class="flex items-center max-w-full mt-6">
             

                <PrimaryButton class=" bg-blue-500 w-full rounded-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
            <div class="mx-auto mt-6 w-full text-center">
               <span class="text-sm text-gray-500">
                Dont Have An Account? 
                </span> 
             <Link v-if="canResetPassword" :href="route('register')" class="text-sm text-blue-600 underline font-medium  hover:text-gray-900 ml-2 ">

                    Sign Up Here
                </Link>
            </div>
        </form>
        </div>
        </div>
    </GuestLayout>
</template>
