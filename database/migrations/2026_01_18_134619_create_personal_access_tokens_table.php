PS D:\STUDIO\web_latif> npm run build

> build     
> vite build

▲ [WARNING] Duplicate key "plugins" in object literal [duplicate-object-key]

    vite.config.js:19:4:
      19 │     plugins: [
         ╵     ~~~~~~~

  The original key "plugins" is here:

    vite.config.js:7:4:
      7 │     plugins: [
        ╵     ~~~~~~~

vite v7.3.1 building client environment for production...
transforming (1) resources\js\app.jsBrowserslist: browsers data (caniuse-lite) is 8 months old. Please run:
  npx update-browserslist-db@latest
  Why you should do it regularly: https://github.com/browserslist/update-db#readme
✓ 53 modules transformed.
public/build/manifest.json              0.33 kB │ gzip:  0.17 kB
public/build/assets/app-qKiQGc9x.css  110.45 kB │ gzip: 15.53 kB
public/build/assets/app-CKl8NZMC.js    36.69 kB │ gzip: 14.75 kB
✓ built in 1.59s<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->text('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
