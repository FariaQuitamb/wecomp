<?php

namespace Database\Seeders;

use App\Models\Sector;
use App\Models\Solution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PageSeeder::class);

        $solutions = collect([
            [
                'title' => 'Segurança Contra Incêndios',
                'slug' => 'seguranca-contra-incendios',
                'eyebrow' => 'SCI · DP 195/11 · NP 4386:2014',
                'excerpt' => 'Deteção, extinção e evacuação projetadas como um ecossistema para proteger vidas e continuidade.',
                'content' => '<h2>Um incêndio compromete mais do que o edifício</h2><p>Uma resposta inadequada pode interromper a operação, expor pessoas e criar responsabilidade legal. O sistema deve ser dimensionado para o risco real, a ocupação e a criticidade de cada espaço.</p><h3>O que integramos</h3><ul><li>Deteção automática e alarme de incêndio</li><li>Extinção portátil e sistemas fixos</li><li>Sinalização, iluminação e engenharia de evacuação</li><li>Redes hidráulicas, bombagem e reserva de água</li><li>Comissionamento, formação e plano de manutenção</li></ul>',
                'legal_framework' => 'DP 195/11 · NP 4386:2014',
                'hero_image' => 'solucao-sci.jpg',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Segurança Eletrónica',
                'slug' => 'seguranca-eletronica',
                'eyebrow' => 'CCTV · Acessos · Intrusão',
                'excerpt' => 'Videovigilância, controlo de acessos e deteção de intrusão integrados para antecipar eventos.',
                'content' => '<h2>Ver não basta: é preciso detetar e responder</h2><p>A segurança eletrónica deve reduzir pontos cegos, identificar eventos relevantes e apoiar uma resposta verificável sem criar complexidade operacional desnecessária.</p><h3>O que integramos</h3><ul><li>CCTV IP e análise inteligente de vídeo</li><li>Controlo de acessos biométrico e por credencial</li><li>Deteção de intrusão e alarmes técnicos</li><li>Centrais de monitorização e integração de sistemas</li><li>Políticas de acesso, retenção e evidência</li></ul>',
                'legal_framework' => 'Vigilância · Controlo de acessos · Proteção de dados',
                'hero_image' => 'solucao-eletronica.jpg',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'SHST e EPIs',
                'slug' => 'shst-e-epis',
                'eyebrow' => 'SHST · Lei Geral do Trabalho 12/23',
                'excerpt' => 'Proteção individual, primeiros socorros e sinalização alinhados com os riscos de cada função.',
                'content' => '<h2>Equipamento sem avaliação não é prevenção</h2><p>Selecionar EPI exige conhecer o perigo, o nível de exposição, a tarefa e o utilizador. A entrega deve ser acompanhada por registo, formação e controlo de substituição.</p><h3>O que integramos</h3><ul><li>Levantamento de perigos por função</li><li>Seleção e fornecimento de EPI certificado</li><li>Sinalização de segurança e emergência</li><li>Kits de primeiros socorros e equipamentos coletivos</li><li>Registos de entrega, formação e inspeção</li></ul>',
                'legal_framework' => 'Lei Geral do Trabalho 12/23',
                'hero_image' => 'solucao-shst.jpg',
                'is_published' => true,
                'sort_order' => 3,
            ],
        ])->mapWithKeys(function (array $data): array {
            $solution = Solution::query()->updateOrCreate(['slug' => $data['slug']], $data);

            return [$solution->slug => $solution];
        });

        $sectors = [
            [
                'data' => [
                    'title' => 'Setor Bancário e Financeiro',
                    'slug' => 'banca-e-financas',
                    'excerpt' => 'Continuidade das agências, proteção de ativos, controlo de acessos e evidência para auditoria.',
                    'content' => '<h2>Uma agência segura tem de continuar operacional</h2><p>A banca combina circulação de público, ativos críticos, exigências de auditoria e uma rede distribuída. A resposta deve manter os mesmos critérios na sede, agências e centralidades.</p><h3>Prioridades do setor</h3><ul><li>Continuidade de agências e infraestrutura crítica</li><li>Controlo de acessos e rastreabilidade</li><li>Deteção precoce e resposta coordenada</li><li>Documentação uniforme em redes multi-província</li></ul>',
                    'hero_image' => 'setor-bancario.jpg',
                    'is_published' => true,
                    'sort_order' => 1,
                ],
                'solutions' => ['seguranca-contra-incendios', 'seguranca-eletronica', 'shst-e-epis'],
            ],
            [
                'data' => [
                    'title' => 'Retalho e Distribuição',
                    'slug' => 'retalho-e-distribuicao',
                    'excerpt' => 'Proteção de espaços com elevado fluxo de público, mercadoria e múltiplos pontos operacionais.',
                    'content' => '<h2>Fluxo de público transforma segundos em impacto</h2><p>Uma loja ou centro comercial precisa detetar cedo, orientar uma evacuação clara e reduzir perdas sem comprometer a experiência do cliente.</p><h3>Prioridades do setor</h3><ul><li>Deteção e evacuação em áreas de público</li><li>Videovigilância e prevenção de perdas</li><li>Proteção de armazéns e zonas técnicas</li><li>Manutenção coordenada em redes de lojas</li></ul>',
                    'hero_image' => 'setor-retalho.jpg',
                    'is_published' => true,
                    'sort_order' => 2,
                ],
                'solutions' => ['seguranca-contra-incendios', 'seguranca-eletronica'],
            ],
            [
                'data' => [
                    'title' => 'Indústria, Logística e Saúde',
                    'slug' => 'industria-logistica-e-saude',
                    'excerpt' => 'Gestão de riscos elevados, proteção do trabalhador e continuidade de processos críticos.',
                    'content' => '<h2>Ambientes críticos exigem controlo por camadas</h2><p>Máquinas, energia, substâncias, circulação logística e ocupações especiais criam riscos que não podem ser tratados por uma lista genérica de equipamentos.</p><h3>Prioridades do setor</h3><ul><li>HIRA por processo, tarefa e área</li><li>Proteção coletiva e individual</li><li>Deteção e contenção de incêndios</li><li>Controlo de acessos a zonas críticas</li></ul>',
                    'hero_image' => 'setor-industria.jpg',
                    'is_published' => true,
                    'sort_order' => 3,
                ],
                'solutions' => ['seguranca-contra-incendios', 'seguranca-eletronica', 'shst-e-epis'],
            ],
        ];

        foreach ($sectors as $item) {
            $sector = Sector::query()->updateOrCreate(
                ['slug' => $item['data']['slug']],
                $item['data'],
            );
            $sector->solutions()->sync(
                collect($item['solutions'])->map(fn (string $slug) => $solutions[$slug]->id),
            );
        }
    }
}
