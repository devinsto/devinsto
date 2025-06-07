<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import DeleteUser from '@/components/DeleteUser.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import { type BreadcrumbItem, type SharedData, type User } from '@/types';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Profile settings',
        href: '/settings/profile',
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;

const form = useForm({
    name: user.name,
    email: user.email,
    avatar: null as File | null,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        _method: 'PATCH' // ← Changé de PUT à PATCH
    })).post(route('profile.update'), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            form.avatar = null;
            form.reset('avatar');
        },
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Profile settings" />

        <SettingsLayout>
            <!-- Avatar display section -->
            <div class="flex flex-col items-center mb-6">
                <div
                    class="relative group w-32 h-32 rounded-full border-4 border-[#0a5d3b] bg-gradient-to-br from-[#e0f7ef] to-[#f8fafc] shadow-lg overflow-hidden transition-all duration-300">
                    <img v-if="user.avatar" :src="`/storage/${user.avatar}`" alt="Avatar"
                        class="w-full h-full object-cover rounded-full transition-transform duration-300 group-hover:scale-105" />


                    <div v-else
                        class="w-full h-full flex items-center justify-center bg-[#e0f7ef] text-[#0a5d3b] text-5xl font-bold rounded-full">
                        {{ user.name.charAt(0).toUpperCase() }}
                    </div>
                    <div
                        class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
                        <span class="text-white text-xs font-semibold">Changer l'avatar</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-6">
                <HeadingSmall title="Profile information" description="Update your name and email address" />



                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid gap-4">
                        <div class="grid gap-2">
                            <Label for="name">Name</Label>
                            <Input id="name" v-model="form.name" class="w-full" autocomplete="name"
                                placeholder="Full name" />
                            <InputError :message="form.errors.name" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="email">Email address</Label>
                            <Input id="email" type="email" v-model="form.email" class="w-full" autocomplete="email"
                                placeholder="Email address" />
                            <InputError :message="form.errors.email" />
                        </div>

                        <div v-if="mustVerifyEmail && !user.email_verified_at" class="text-sm text-muted-foreground">
                            Your email address is unverified.
                            <Link :href="route('verification.send')" method="post"
                                class="text-primary underline hover:text-primary/80">
                            Click here to resend the verification email.
                            </Link>
                            <div v-if="status === 'verification-link-sent'" class="mt-2 text-sm text-green-600">
                                A new verification link has been sent to your email address.
                            </div>
                        </div>

                        <div class="grid gap-2">
                            <Label for="avatar">Avatar</Label>
                            <Input type="file" id="avatar" accept="image/*"
                                @change="e => form.avatar = e.target.files?.[0] || null" class="w-full" />
                            <InputError :message="form.errors.avatar" />
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <Button type="submit" :disabled="form.processing">
                                Save changes
                            </Button>
                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-if="form.recentlySuccessful" class="text-sm text-muted-foreground">
                                    Saved.
                                </p>
                            </Transition>
                        </div>
                    </div>
                </form>

                <DeleteUser />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
