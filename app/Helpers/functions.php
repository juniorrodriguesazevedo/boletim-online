<?php

use App\Enums\TicketEnum;

use function PHPUnit\Framework\returnSelf;

function status($status): string
{
    return $status == 1 ? '<span class="badge badge-info">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>';
}

function getRoleName($value): string
{
    $role =  str_replace(['[', '"', ']'], '', $value->pluck('description'));

    return empty($role) ? 'Sem função' : $role;
}

function formatCPF($cpf): string
{
    return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
}

function formatCNS($cns): string
{
    return preg_replace('/(\d{3})(\d{4})(\d{4})(\d{4})/', '$1.$2.$3.$4', $cns);
}

function formatCEP($cep): string
{
    return preg_replace('/(\d{5})(\d{3})/', '$1-$2', $cep);
}

function formatPhone($phone): string | null
{
    if (strlen($phone) === 10) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $phone);
    } elseif (strlen($phone) === 11) {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phone);
    }

    return $phone;
}

function formatDate($date): string
{
    return date('d/m/Y', strtotime($date));
}

function getEvent($event): string
{
    switch ($event) {
        case 'created':
            return 'Cadastro';
        case 'updated':
            return 'Atualização';
        case 'deleted':
            return 'Exclusão';
    }
}

function ticketStatus($status): string
{
    switch ($status) {
        case TicketEnum::OPEN:
           return '<span class="badge badge-info">ABERTO</span>';
        case TicketEnum::ANSWERED:
            return '<span class="badge badge-warning">RESPONDIDO</span>';
        case TicketEnum::FINISHED:
            return '<span class="badge badge-success">FINALIZADO</span>';
    }
}
