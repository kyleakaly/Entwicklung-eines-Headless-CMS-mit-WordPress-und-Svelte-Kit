<!-- Particulas.svelte -->
<script lang="ts">
    import { onMount } from 'svelte';
    
    let canvas: HTMLCanvasElement;
    let ctx: CanvasRenderingContext2D;
    const numStars = 500;
    const stars = [];

    onMount(() => {
        ctx = canvas.getContext('2d');

        // Set canvas size
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Create random stars
        for (let i = 0; i < numStars; i++) {
            stars.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random(),
                speed: Math.random() * 0.1  // Ajusta la velocidad aquí
            });
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < numStars; i++) {
                const star = stars[i];

                ctx.beginPath();
                ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';
                ctx.fill();

                // Update star position
                star.x -= star.speed;

                // Reset star position if it goes off screen
                if (star.x < 0) {
                    star.x = canvas.width + star.radius;
                    star.y = Math.random() * canvas.height;
                }
            }

            requestAnimationFrame(draw);
        }

        draw();
    });
</script>

<canvas bind:this={canvas} id="starfield"></canvas>

<style>
    canvas {
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1; /* Coloca el canvas detrás de otros elementos */
        width: 100%;
        height: 100%;
    }
</style>