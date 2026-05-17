@php $inputClass = 'w-full h-10 px-3 bg-surface-container-lowest border rounded-lg font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-offset-2 hover:bg-surface-container-low transition-colors'; @endphp

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">

    <!-- NIK -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="nik">NIK <span class="text-error">*</span></label>
        <input id="nik" name="nik" type="text" maxlength="20" value="{{ old('nik', $employee->nik ?? '') }}"
            placeholder="Masukkan 16 digit NIK"
            class="{{ $inputClass }} @error('nik') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('nik')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Nama Lengkap -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="full_name">Nama Lengkap <span class="text-error">*</span></label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $employee->full_name ?? '') }}"
            placeholder="Masukkan nama lengkap"
            class="{{ $inputClass }} @error('full_name') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('full_name')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Email -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="email">Email <span class="text-error">*</span></label>
        <input id="email" name="email" type="email" value="{{ old('email', $employee->email ?? '') }}"
            placeholder="contoh@email.com"
            class="{{ $inputClass }} @error('email') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('email')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Nomor HP -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="phone_number">Nomor HP <span class="text-error">*</span></label>
        <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', $employee->phone_number ?? '') }}"
            placeholder="08xxxxxxxxxx"
            class="{{ $inputClass }} @error('phone_number') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('phone_number')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Jenis Kelamin -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="gender">Jenis Kelamin <span class="text-error">*</span></label>
        <select id="gender" name="gender"
            class="{{ $inputClass }} @error('gender') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" {{ old('gender', $employee->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender', $employee->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Agama -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="religion">Agama <span class="text-error">*</span></label>
        <select id="religion" name="religion"
            class="{{ $inputClass }} @error('religion') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Agama --</option>
            @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                <option value="{{ $agama }}" {{ old('religion', $employee->religion ?? '') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
            @endforeach
        </select>
        @error('religion')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Tempat Lahir -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="birth_place">Tempat Lahir <span class="text-error">*</span></label>
        <input id="birth_place" name="birth_place" type="text" value="{{ old('birth_place', $employee->birth_place ?? '') }}"
            placeholder="Kota tempat lahir"
            class="{{ $inputClass }} @error('birth_place') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('birth_place')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Tanggal Lahir -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="birth_date">Tanggal Lahir <span class="text-error">*</span></label>
        <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date', isset($employee) && $employee->birth_date ? $employee->birth_date->format('Y-m-d') : '') }}"
            class="{{ $inputClass }} @error('birth_date') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('birth_date')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Status Pernikahan -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="marital_status">Status Pernikahan <span class="text-error">*</span></label>
        <select id="marital_status" name="marital_status"
            class="{{ $inputClass }} @error('marital_status') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Status --</option>
            <option value="Belum Kawin" {{ old('marital_status', $employee->marital_status ?? '') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
            <option value="Kawin" {{ old('marital_status', $employee->marital_status ?? '') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
            <option value="Cerai" {{ old('marital_status', $employee->marital_status ?? '') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
        </select>
        @error('marital_status')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Kota -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="city">Kota <span class="text-error">*</span></label>
        <input id="city" name="city" type="text" value="{{ old('city', $employee->city ?? '') }}"
            placeholder="Kota domisili"
            class="{{ $inputClass }} @error('city') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('city')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Alamat (Full Width) -->
    <div class="md:col-span-2 space-y-1">
        <label class="block font-label-md text-on-surface" for="address">Alamat Lengkap <span class="text-error">*</span></label>
        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap"
            class="w-full px-3 py-2 bg-surface-container-lowest border rounded-lg font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-offset-2 hover:bg-surface-container-low transition-colors @error('address') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">{{ old('address', $employee->address ?? '') }}</textarea>
        @error('address')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Separator: Data Kepegawaian -->
    <div class="md:col-span-2 mt-2">
        <h3 class="font-headline-sm text-[16px] text-on-surface border-b border-outline-variant pb-2">Data Kepegawaian</h3>
    </div>

    <!-- Departemen -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="department_id">Departemen <span class="text-error">*</span></label>
        <select id="department_id" name="department_id"
            class="{{ $inputClass }} @error('department_id') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id ?? '') == $dept->id ? 'selected' : '' }}>{{ $dept->name }} ({{ $dept->code }})</option>
            @endforeach
        </select>
        @error('department_id')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Jabatan -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="position_id">Jabatan <span class="text-error">*</span></label>
        <select id="position_id" name="position_id"
            class="{{ $inputClass }} @error('position_id') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('position_id', $employee->position_id ?? '') == $pos->id ? 'selected' : '' }}>{{ $pos->name }} ({{ $pos->level }})</option>
            @endforeach
        </select>
        @error('position_id')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Pendidikan -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="education_id">Pendidikan Terakhir <span class="text-error">*</span></label>
        <select id="education_id" name="education_id"
            class="{{ $inputClass }} @error('education_id') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Pendidikan --</option>
            @foreach($educations as $edu)
                <option value="{{ $edu->id }}" {{ old('education_id', $employee->education_id ?? '') == $edu->id ? 'selected' : '' }}>{{ $edu->degree }}</option>
            @endforeach
        </select>
        @error('education_id')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Tanggal Bergabung -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="join_date">Tanggal Bergabung <span class="text-error">*</span></label>
        <input id="join_date" name="join_date" type="date" value="{{ old('join_date', isset($employee) && $employee->join_date ? $employee->join_date->format('Y-m-d') : '') }}"
            class="{{ $inputClass }} @error('join_date') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('join_date')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Status Kepegawaian -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="employment_status">Status Kepegawaian <span class="text-error">*</span></label>
        <select id="employment_status" name="employment_status"
            class="{{ $inputClass }} @error('employment_status') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
            <option value="">-- Pilih Status --</option>
            <option value="Tetap" {{ old('employment_status', $employee->employment_status ?? '') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
            <option value="Kontrak" {{ old('employment_status', $employee->employment_status ?? '') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
            <option value="Magang" {{ old('employment_status', $employee->employment_status ?? '') == 'Magang' ? 'selected' : '' }}>Magang</option>
        </select>
        @error('employment_status')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Gaji Pokok -->
    <div class="space-y-1">
        <label class="block font-label-md text-on-surface" for="basic_salary">Gaji Pokok (Rp) <span class="text-error">*</span></label>
        <input id="basic_salary" name="basic_salary" type="number" step="0.01" value="{{ old('basic_salary', $employee->basic_salary ?? '') }}"
            placeholder="0"
            class="{{ $inputClass }} @error('basic_salary') border-error focus:border-error focus:ring-error @else border-outline-variant focus:border-primary focus:ring-primary @enderror">
        @error('basic_salary')<small class="text-error text-[12px] mt-0.5 block">{{ $message }}</small>@enderror
    </div>

    <!-- Status Aktif -->
    <div class="space-y-1 flex items-end">
        <label class="flex items-center cursor-pointer gap-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $employee->is_active ?? true) ? 'checked' : '' }}
                class="h-5 w-5 rounded border-outline-variant text-primary focus:ring-primary bg-surface-container-lowest cursor-pointer">
            <span class="font-label-md text-on-surface">Pegawai Aktif</span>
        </label>
    </div>
</div>
