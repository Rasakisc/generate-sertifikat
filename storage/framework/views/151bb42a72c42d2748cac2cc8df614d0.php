

<?php $__env->startSection('content'); ?>
<style>
    @media only screen and (min-width: 1101px) {
        .d-grid {
            grid-template-columns: repeat(2,1fr);
            height:100%;
        }
        #left {
            width:100%;
        }
    }
    
    #left {
        background-color: #1E90FF;
    }
    
    @media only screen and (max-width:1100px) {
        .d-grid {
            grid-template-columns: repeat(1,1fr);  
            width: 100%;
            height:auto;     
        }
        #left {
            background-color: #1E90FF;
            width:100%;
        }
        #right {
            height:100%
        }
        #gmb {
            width: 100vw;
        }
    }
    
    #id {
        text-decoration: none;
    }
    
    #id:hover {
        text-decoration: underline;
    }
</style>

<div class="d-grid">
    <div id="right">
        <img id="gmb" src="img/login.png" alt="">
    </div>
    
    <div id="left" class="p-5">
        <h2 class="text-center fw-bold mb-5 text-light fs-1"><?php echo e(__('Entry Your Account')); ?></h2>
        
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row mb-3">
                    <label for="email" class="col-form-label text-md-start text-light fs-4"><?php echo e(__('Email or Username')); ?></label>

                    <div>
                        <input id="email" type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Masukkan Email atau Username">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="password" class="text-light fs-4 col-form-label text-md-start"><?php echo e(__('Password')); ?></label>

                    <div>
                        <div class="position-relative">
                            <input placeholder="*********" id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                            <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()">
                                <i id="eye-icon" class="bi bi-eye text-secondary fs-5"></i>
                            </span>
                        </div>
                    
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="form-check">
                        <input class="form-check-input m-auto" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <label class="form-check-label text-light fs-6" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <?php echo e(__('Login')); ?>

                </button>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <?php if(Route::has('password.request')): ?>
                        <a class="text-light" id="id" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Lupa Password?')); ?>

                        </a>
                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>
                        <a class="text-light fw-bold" id="id" href="<?php echo e(route('register')); ?>">
                            <?php echo e(__('Belum punya akun? Daftar')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div> 
</div>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("bi-eye");
            eyeIcon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bi-eye-slash");
            eyeIcon.classList.add("bi-eye");
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\generate-sertifikat\views/auth/login.blade.php ENDPATH**/ ?>