<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\JenisDisposisi
 *
 * @property int $id
 * @property string $jenis_disposisi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SuratMasuk> $SuratMasuk
 * @property-read int|null $surat_masuk_count
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi whereJenisDisposisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisDisposisi whereUpdatedAt($value)
 */
	class JenisDisposisi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SuratKeluar
 *
 * @property int $id
 * @property string $nomor_surat
 * @property string $tanggal_surat
 * @property string $tanggal_kirim
 * @property string $perihal
 * @property string $tujuan
 * @property string $asal_surat
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereAsalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar wherePerihal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereTanggalKirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereTanggalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratKeluar whereUpdatedAt($value)
 */
	class SuratKeluar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SuratMasuk
 *
 * @property int $id
 * @property string $nomor_surat
 * @property string $tanggal_surat
 * @property string $tanggal_diterima
 * @property string $perihal
 * @property string $asal_surat
 * @property string|null $nomor_agenda
 * @property string $file
 * @property int|null $jenis_disposisi_id
 * @property string|null $kabag_tujuan
 * @property string|null $staff_tujuan
 * @property string|null $tgl_diposisi_pimpinan
 * @property string|null $tgl_diposisi_kabag
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\JenisDisposisi|null $JenisDisposisi
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereAsalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereJenisDisposisiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereKabagTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereNomorAgenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk wherePerihal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereStaffTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereTanggalDiterima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereTanggalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereTglDiposisiKabag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereTglDiposisiPimpinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereUpdatedAt($value)
 */
	class SuratMasuk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TemporaryFile
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryFile query()
 */
	class TemporaryFile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property mixed $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

