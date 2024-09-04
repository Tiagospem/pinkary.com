<?php

declare(strict_types=1);

use App\Models\User;

test('is verified', function () {
    $user = User::factory()->create([
        'is_verified' => true,
        'username' => 'test',
    ]);

    expect($user->is_verified)->toBeTrue();
});

test('is not verified because not in sponsors', function () {
    $user = User::factory()->create([
        'is_verified' => false,
        'username' => 'test',
    ]);

    config()->set('sponsors.github_usernames', ['test2']);

    expect($user->is_verified)->toBeFalse()
        ->and($user->is_company_verified)->toBeFalse();
});

test('increment views', function () {
    $user = User::factory()->create();

    User::incrementViews([$user->id]);

    expect($user->fresh()->views)->toBe(1);
});

test('default avatar url', function () {
    $user = User::factory()->create();

    expect($user->avatar)->toBeNull()
        ->and($user->avatar_url)->toBe(asset('img/default-avatar.png'));
});

test('custom avatar url', function () {
    $user = User::factory()->create([
        'avatar' => 'avatars/123.png',
    ]);

    expect($user->avatar)->toBe('avatars/123.png')
        ->and($user->avatar_url)->toBe(Storage::disk('public')->url('avatars/123.png'));
});

test('following', function () {
    $user = User::factory()->create();
    $target = User::factory()->create();

    $user->following()->attach($target->id);

    expect($user->following->count())->toBe(1)
        ->and($user->following->first()->id)->toBe($target->id);
});

test('followers', function () {
    $user = User::factory()->create();
    $target = User::factory()->create();

    $target->following()->attach($user->id);

    expect($user->followers->count())->toBe(1)
        ->and($user->followers->first()->id)->toBe($target->id);
});

test('purge followers with user', function () {
    $user = User::factory()->create();
    $target = User::factory()->create();

    $user->followers()->attach($target->id);

    $target->following()->attach(User::factory()->create()->id);

    $user->purge();

    expect($target->following()->count())->toBe(1);
});

test('purge following with user', function () {
    $user = User::factory()->create();
    $target = User::factory()->create();

    $user->following()->attach($target->id);

    $target->followers()->attach(User::factory()->create()->id);

    $user->purge();

    expect($target->followers()->count())->toBe(1);
});

test('purge links with user', function () {
    $user = User::factory()->hasLinks(2)->create();
    $this->assertDatabaseCount('links', 2);

    $this->actingAs($user)
        ->delete(route('profile.destroy'), [
            'password' => 'password',
        ]);

    $this->assertNull($user->fresh());
    $this->assertDatabaseCount('links', 0);
});
